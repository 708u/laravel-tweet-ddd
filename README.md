# Laravel-tweet-ddd

- twitter風アプリケーションをDDD(ドメイン駆動設計)のアーキテクチャに乗せて実装するプロジェクト

<p align="center">
<a href="https://github.com/naoyaUda/laravel-tweet-ddd/actions"><img src="https://github.com/naoyaUda/laravel-tweet-ddd/workflows/laravel-tweet-ddd/badge.svg" alt="Build Status"></a>
<a href="https://dependabot.com"><img src="https://api.dependabot.com/badges/status?host=github&repo=naoyaUda/laravel-tweet-ddd" alt="Deppendabot Status"></a>
</p>

## Overview

- DDDのコンテキストによる実装
- オーバーエンジニアリングを許容する
    - あくまで個人的な技術アウトプットの場のため

## Environments

- Laravel 7.x
- Mysql 5.7
- Redis 5.0.7
- Docker
- node.js(assetビルド)
    - パッケージ管理: yarn

## Architecture

### Onion Architecture

#### Architecture Overview

<p align="center">
    <img width="55%" src="https://user-images.githubusercontent.com/43739514/76864285-30bf7380-68a4-11ea-8003-76ee28a99a1e.png">
</p>

#### Workflow sequence

- e.g. Create New Entity
![LayerSequence](https://user-images.githubusercontent.com/43739514/76810548-db4a7e80-6831-11ea-9fed-71350d1e0140.png)

### Directory tree

```text
├── domain // Pure Domain Knowledge
│   ├── Base // Base Abstract Classes
│   ├── Application // Application Utility services
│   │   └── Contract
|   |       ├── Uuid
|   |       └── Transaction
│   ├── Model // Domain Model layer
│   │   ├── Entity
|   |   |   ├── Base
|   |   |   └── Tweet
│   │   ├── ValueObject
|   |   |   ├── Base
|   |   |   └── Tweet
│   │   └── DTO
|   |       ├── Base
|   |       └── Tweet
│   ├── Query // Belongs to ApplicationService, Abstract CQRS Query, not included concrete implementation
│   ├── Repository // Belongs to ApplicationService layer, not included concrete implementation
│   │   └── Contract
|   |       └── Tweet
│   └── UseCase // Belongs to ApplicationService layer, Accomplish use-case
|── infrastructure // Concrete Implementations. Should implement ApplicationService interface e.g RDBMS, HTTP Clients...
│   ├── Application // Concrete Utility Application services
|   |   ├── Uuid
|   |   └── Transaction
│   ├── Query // Concrete CQRS Query
|   └── Repository // Concrete Repository
|       ├── Base
│       │   └── InMemoryRepository // for testing
|       └── Tweet
├── app // Laravel app
│   ├── Console
│   ├── Eloquent
│   ├── Exceptions
│   ├── Http
│   │   ├── Actions // For ADR pattern
│   │   │   ├── Frontend
│   │   │   └── Backend
│   │   ├── Responders // For ADR pattern
│   │   │   ├── Frontend
│   │   │   └── Backend
│   │   └── Middleware
│   ├── Providers
│   └── View
│       └── Components
│           └── Partial
├── bootstrap
│   └── cache
├── config
├── database
│   ├── factories
│   ├── migrations
│   └── seeds
├── docker // configs with using docker-compose
│   ├── mysql
│   │   └── init
│   ├── nginx
│   └── php
├── docs
│   └── architecture
├── public
├── resources
│   ├── js
│   │   └── components
│   ├── lang
│   │   └── en
│   ├── sass
│   └── views
│       ├── components
│       │   └── partial
│       ├── frontend
│       ├── backend
│       └── layouts
├── routes
├── storage
│   ├── app
│   │   └── public
│   ├── framework
│   └── logs
└── tests
    ├── Browser // for E2E
    │   ├── Frontend
    │   ├── Backend
    │   ├── Pages
    │   ├── console
    │   └── screenshots
    ├── Feature
    └── Unit
```

### ADR

- [Link](http://pmjones.io/adr/)

## Installation

- dockerを予めインストールしてください。

- clone

```bash
git clone git@github.com:naoyaUda/laravel-tweet-ddd.git
```

- install

```bash
# コンテナのビルド、依存パッケージのインストール、DBの初期化を行う
make install

# permission変更
chown -R 777 storage
chown -R 777 bootstrap/cache
```

## How to

- 各種操作コマンドはMakefileに記述しています。以下コマンドですべてのターゲットを確認できます。

```bash
make help
```
