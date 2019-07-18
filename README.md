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


# 基类() Repository方法

## 1.1 index($where)

>获取符合条件的第一条数据

## 1.2 update($where,$data)

> 更新符合条件的数据

## 1.3 page($page)

> 分页数据


## 1.4 add($data)

> 新增数据，返回新增的模型

## 1.5findByField($field,$value)

> 查找符合field条件的第一条数据

## 1.6 list($where)
> 查找符合条件的数据 返回全部

