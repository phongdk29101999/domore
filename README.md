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
## Migration & Seed
```
docker-compose exec app php artisan migrate && docker-compose exec app php artisan db:seed --class=DatabaseSeeder
```
## Domore local: [http://domore.test.com](http://domore.test.com)
