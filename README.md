# Domore - 赤黒チーム
> チームのメンバー：
> - ドー・キム・フォン（20176843）
> - レ・スアン・ティン（20176880）
> - ドー・ティー・フォン（20176780）
> - ズオン・ヴァン・ドゥック（20176724）
> - グエン・コック・ヴオン（20176915）(欠)
## Requirements
- Docker CE
- Nodejs & NPM
## Init CLI file
```
cp domore-cli.example domore-cli && sudo chmod +x domore-cli
```
## Init neccessary file
> Choose your operation system name: `ubuntu`, `macos-intel`, `macos-m1`
```
./domore-cli init:file [operation-system-name]
```
## Add static ip for macos
> Everytime macos restart, run `./domore-cli init:ip` again.
```
./domore-cli init:ip
```
## Build && Run docker
```
docker-compose build && docker-compose up -d
```
## Import sql file
> Download .sql file from [shared driver file](https://drive.google.com/file/d/1u7iDaLYDREO1Hx3ijMrKX_6pfI66jlIB/view?usp=sharing)
```
./domore-cli load:db -f [sql-file-path]
```
## Load environment file
```
./domore-cli load:env
```
## Load hostsname
```
./domore-cli load:host
```
## Load package
```
./domore-cli load:package
```
## Domore local: [http://domore.test.com](http://domore.test.com)
