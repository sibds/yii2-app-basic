<?php
use yii\bootstrap\Nav;
use yii\helpers\ArrayHelper;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <?=$this->render(
            'widgets/user-left',
            ['directoryAsset' => $directoryAsset]
        )?>

        <?php
        /*
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
         */
        ?>

        <?php
        $basicMenu = ArrayHelper::merge(
            [
                ['label'=>'Рабочий стол', 'icon' => 'dashboard', 'url'=>['//site/index']],
            ],
            \mazurva\helpers\MenuModules::menu());

        $adminMenu=[];
        if(Yii::$app->user->identity->isAdmin){

            $adminMenu = [
                ['label' => '<li class="header">Admin menu</li>'],
            ];

            if(\Yii::$app->hasModule('audit')){
                $adminMenu = ArrayHelper::merge($adminMenu, [
                    [
                        'label' => 'Audit', //for basic
                        'icon' => 'signal',
                        'url' => ['/audit/default/index']
                    ],
                ]);
            }

            if(\Yii::$app->hasModule('user')){
                $adminMenu = ArrayHelper::merge($adminMenu, [
                    [
                        'label' => 'Users', //for basic
                        'icon' => 'users',
                        'url' => ['/user/admin/index']
                    ],
                ]);
            }

            if(YII_DEBUG){
                $adminMenu = ArrayHelper::merge($adminMenu,
                    [
                        ['label'=>'<li class="header">Developer menu</li>'],
                    ]) ;
                $supportModule = [
                    'gii' => ['label' => 'Gii', 'icon'=>'file-code-o', 'url' => ['/gii']],
                    'utility' => ['label' => 'Utility', 'icon'=>'wrench', 'url' => ['/utility']],
                    'debug' => ['label' => 'Debug', 'icon'=>'dashboard', 'url' => ['/debug']],
                ];

                foreach ($supportModule as $key => $value){
                    if(\Yii::$app->hasModule($key)){
                        $adminMenu = ArrayHelper::merge($adminMenu, [$value]);
                    }
                }
            }
        }

        ?>
        <?=\dmstr\widgets\Menu::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=>'tree'],
                'items' => \yii\helpers\ArrayHelper::merge($basicMenu,$adminMenu),
            ]
        );
        ?>
    </section>

</aside>
