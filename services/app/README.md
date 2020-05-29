### Service `App`

Service `App` is used to prepare test data and to emulate some workload.

#### Data preparation

To prepare test data use:
```$xslt
$ make prepare-db
```
This will insert 100K and 3M records to `test_table_small` and `test_table_big` tables. 

#### Emulating workloads

Check the schedule for running example queries to test tables at `services/app/config/cron/crontab` file.
