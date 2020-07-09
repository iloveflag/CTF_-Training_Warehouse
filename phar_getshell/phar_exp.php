<?php
    class Test{

    }
    @unlink("test.phar");
    $phar = new Phar("test.phar"); //后缀名必须为phar
    $phar->startBuffering();
    $phar->setStub("<?php __HALT_COMPILER(); ?>"); //设置stub
    $o = new Test();
    $phar->setMetadata($o); //将自定义的meta-data存入manifest
    $phar->addFromString("test.php", "<?php phpinfo();"); //添加要压缩的文件
    $phar->stopBuffering();    //签名自动计算
?>