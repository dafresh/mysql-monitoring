## MySQL monitoring with Prometheus, Grafana, Anemometer

This example provides an easy way to get some knowledge on how to use 
MySQL monitoring tools.

### Requirements
- Docker
- Docker compose
- make

### Warning
This setup should not be used for production purposes as is.
Consider proper configuration for your case.

### How to use

##### Initialize
Run `make up`

##### Seed tables with example data
Run `make prepare-db`

### Resources
- Grafana: http://localhost:3000
- Prometheus web UI: http://localhost:9090/targets
- Anemometer: http://localhost
- mysqld_exporter: http://localhost:9104/metrics
- node_exporter: http://localhost:9100/metrics

### Sysbench benchmark examples

Checkout some example benchmarks for SQL queries performance:
`services/sysbench/tests/`

##### Run benchmarks
`make benchmark`

Checkout results in `services/sysbench/reports/` directory

#### Readme
Check README.md files for services
