# Laravel-tweet-ddd

- twitter風アプリケーションをDDD(ドメイン駆動設計)のアーキテクチャに乗せて実装するプロジェクト

<p align="center">
<a href="https://github.com/naoyaUda/laravel-tweet-ddd/actions"><img src="https://github.com/naoyaUda/laravel-tweet-ddd/workflows/laravel-tweet-ddd/badge.svg" alt="Build Status"></a>
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

## Installation

- dockerを予めインストールしてください。

- clone

```bash
git clone git@github.com:naoyaUda/laravel-tweet-ddd.git
```

- install

```bash
// コンテナのビルド、依存パッケージのインストール、DBの初期化を行う
make install

// permission変更
chown -R 777 storage
chown -R 777 bootstrap/cache
```

## How to

- 各種操作コマンドはMakefileに記述しています。
