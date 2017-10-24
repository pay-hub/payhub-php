

### 使用[composer](https://getcomposer.org/)
> composer 是php的包管理工具， 通过composer.json里的配置管理依赖的包，同时可以在使用类时自动加载对应的包

在你的composer.json中添加如下依赖

```
	composer require pay-hub.cn/payhub-php:{version}
```

## 初始化
```
    \Payhub\Payhub::registerApp($app_id, $app_secret)
```

## 发起支付订单
```
    \Payhub\Payhub::registerApp(array $data)
```
## 查询订单
```
    \Payhub\Payhub::registerApp(array $data)
```

