# fbleak-searchengine
Web-based search engine for April 2021 Facebook leaked data using Elasticsearch 7 / Logstash / PHP in Docker containers,
because using grep is boring :)


## Installation / Usage

Clone the repo , place leak TXTs in **/fb_data** folder and bring up the Docker containers with

```bash
docker-compose up
```

Wait for the Logstash pipeline to complete indexing data to Elasticsearch (it can take a loooot of time depending on the files amount / size),
you should be able to notice **/es_data** folder growing during execution.

Web server container is running on **localhost:8181** with the search bar to perform ajax queries.

## Disclaimer

Done as a quick personal project to combine and improve skills on using Docker and ELK stack,
use it at your own risk.
