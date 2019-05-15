#命令

## 1.创建interface命令

``` 
php artisan make:repoi TestInterface
```

生成TestInterface文件

### 参数 -r
```
php artisan make:repoi TestInterface -r
```
同时生成 TestRepository文件

## 2.生成repository文件

```
php artisan make:repo TestRepository
```
生成repository文件

### 参数 -m modelname 
```
php artisan make:repo TestRepository -m TestModel
```

指定model的名称，不能包含model的路径

### 参数 -i test
```
php artisan make:repo TestRepository -i Test
```

指定interface为testInterface