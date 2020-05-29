### Service `Slow log cron`

#### Scheduled digest updates
Every 5 minutes service `slow log cron` parses MySQL slow log file to get the data for anemometer.
Time frame could be configured in crontab config file: `services/slow-log-cron/config/cron/crontab`

#### Percona toolkit query digest
You can configure database host and destination tables for slow log data as `pt-query-digest` 
command arguments in file: `services/slow-log-cron/commands/query-digest.sh`

`pt-query-digest` tool has some specifics:
- It processes slow log file and stores information to the database. 
- If the same (with no changes) file is processed again, nothing happens.
- If new record was added to already processed slow log file, `pt-query-digest` would assume this file 
as new, so whole slow log file would be processed again (this should avoided).
- To avoid duplicated records from slow log file `logrotate` utility is used. In current setup it will rotate 
slow log file every 5 minutes (old file is erased right after it was processed), so no duplicates would be saved to the database. 
Also, `logrotate` provides graceful copy-truncate procedure of slow log file regarding the database.
