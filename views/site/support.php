<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = 'Поддержка клиентов';
?>
<!-- Main content -->
<section class="content">

    <div class="error-page">
        <h2 class="headline text-info"><i class="fa fa-info text-green"></i></h2>

        <div class="error-content">
            <h3><?= $this->title ?></h3>

            <p>К сожалению у Вашего сайта отсутсвует подписка на поддержку клиентов.</p>
            <p>Для заключения договора на поддержку сайта, можно перейти на сайт <a href="#" target="_blank">example.com</a> и связаться с сотрудниками компании любым удобным для Вас способом,
                или написать письмо в службу поддержки клиентов компании Example&raquo; на <a href="#">help@example.com</a>.
            </p>
            <p>С уважением, <br>
                Служба поддержки клиентов <a href="#" target="_blank">Example</a>.
            </p>
        </div>
    </div>

</section>