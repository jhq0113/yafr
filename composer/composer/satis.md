# [satis](https://github.com/AOEpeople/composer-satis-builder)

## 安装
```shell
cd /data/satis
composer create-project composer/satis --stability=dev --keep-vcs
cd satis
```

## 去gitlab建立私有版本库，定义composer.json,commit同时push到gitlab

## vim satis.json;编辑json文件
```json
{
    "name": "com",
    "homepage": "http://www.jhq0113.com",
    "repositories": [
        {"type": "vcs", "url": "https://github.com/bambooleaf/reps_demo.git"}
    ],
    "require":{
        "com/com":"*"
    },
    "archive":{
        "directory":"dist",
        "format":"tar",
        "prefix-url":"http://www.jhq0113.com",
        "skip-dev":false
    }
}
```

## 生成
```shell
php bin/satis build satis.json public/
```

## 配置nginx
```nginx
server {
    listen  80;
    server_name www.jhq0113.com;
    root /data/satis/public;
    index index.php index.html;
    access_log off;
    rewrite_log off;
    
    location = /favicon.ico {
            log_not_found off;
            access_log off;
    }
}
```

## 使用
```json
{
    "repositories":[
        {
          "type": "composer",
          "url": "http://www.jhq0113.com"
        }
      ],
      "config":{
        "secure-http":false
      }
}

```

## 更新
```shell
php bin/satis build satis.json public/
```

