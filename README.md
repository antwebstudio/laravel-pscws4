# laravel-pscws4

### pscws4 项目介绍
###### pscws4是pscws系列分词的第四版本原项目网站信息如下：
###### SCWS 项目网站：http://www.ftphp.com/scws

### 在laravel中使用pscws4原因
###### 由于laravel项目需要用到分词,laravel没找到相关扩展，因此将pscws4写成laravel的一个扩展，便于使用

### 安装
* 1、执行命令

    `composer require mecyu/laravel-pscws4`

* 2、发布配置文件：

    `php artisan vendor:publish --provider="Mecyu\LaravelPscws4\PSCWS4ServiceProvider"`


* 3、注册服务提供者，在config/app.php中的provider选项添加,

    `\Mecyu\LaravelPscws4\PSCWS4ServiceProvider::class`

* 4、添加facades别名，在config/app.php中的aliases选项添加,

    `'Pscws4'=>\Mecyu\LaravelPscws4\Facades\PSCWS4::class`

### 使用
* 1、创建控制器：
    
    `php artisan make:controller Pscws4Controller`
    
* 2、在文件中引用：`use Pscws4;`在创建的方法中直接使用`Pscws4::testPscws4();` 获得如下结果

 `
 
    <?php
    namespace App\Http\Controller;
    
    use Pscws4;
    class Pscws4Controller extends Controller
    {
        /**
         *  is the installation successed or not
         */
        public function test()
        {
            Pscws4::testPscws4();
        }
        
        /**
         *  use pscws4 in your project
         */
        public function functionName()
        {
            $text = "中国航天官员应邀到美国与太空总署官员开会，My name is Mecyu";
            $cws = Pscws4::send_text($text);
            $ret = $cws->get_tops(10);
            var_dump($ret);
            exit;
        }
    }
    ================= success result =====================
    pscws version: PSCWS/4.0 - by hightman
    Segment result:
    中 国 航 天 官员应 邀 到 美 国 与 太 空总署 官员开 会 
    发 展 中 国 家 
    上 海 大 学 城 书 店 
    表 面 的 东 西 
    今 天 我 买 了 一 辆 面 的 ， 于是我 坐 着 面 的 去 上 班 
    化 妆 和 服 装 
    这 个 门 把 手 坏 了 ， 请 把 手 拿 开 
    将 军 任命了 一 名 中 将 ， 产 量 三 年 中 将 增 长 两 倍 
    王军虎 去 广 州 了 ， 王军虎 头 虎 脑 的 
    欧 阳 明 练功很 厉害可 是 马明练 不 厉害 
    毛泽东 北 京 华烟云 
    人 中 出 吕布 马中出 赤 兔 Q 1 , 中 我 要 买 Q 币 充 值 Top words stats:
    
     No.  Word  Attr  Times  Rank  
     01.  王军虎  nr  2  7.00 
     02.  官员应  nr  1  3.50 
     03.  空总署  nr  1  3.50 
     04.  官员开  nr  1  3.50 
     05.  于是我  nr  1  3.50 
     06.  任命了  nr  1  3.50 
     07.  练功很  nr  1  3.50 
     08.  厉害可  nr  1  3.50 
     09.  马明练  nr  1  3.50 
     10.  厉害    nr  1  3.50 
     11.  毛泽东  nr  1  3.50 
     12.  华烟云  nr  1  3.50 
     13.  吕布    nr  1  3.50 
     14.  马中出  nr  1  3.50 
    
 `
    即为安装成功。
