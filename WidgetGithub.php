<?php

    class WidgetGithub extends WP_Widget {
        public function __construct(){
            $dado = array("classname"=>"WidgetGithub","description"=>"Listagem do plugin Github");

            parent::__construct("widgets_github","Github Widget",$dado);
        }

        public function widget($args, $instance){

            function api_convert_json_github($request_url){
                $options = array("http"=>array("user_agent"=> $_SERVER['HTTP_USER_AGENT']));
                $context = stream_context_create($options);
                $response = file_get_contents($request_url, false, $context);
                $dados = json_decode($response);
                return $dados;
            }
            $request_url = "https://api.github.com/users/Gabriel-souzaa/repos"; //?sort=createdDate = Ordena do atual para os recentes
            $repos = api_convert_json_github($request_url);

            $request_url = "https://api.github.com/users/Gabriel-souzaa";
            $user = api_convert_json_github($request_url);
        ?>

            <div class="user">
                <h4>Dados do usuário: </h4>
                <img src="<?php echo $user->avatar_url; ?>" alt="">
                Nickname: <?php echo $user->name; ?><br>
                Email: <?php echo $user->email; ?>
                <hr>
                <h4>Repositórios: </h4>
            </div>

            <?php foreach($repos as $repo): ?>
                Nome do repositório: "<?php echo $repo->name; ?>"<br>
                Linguagem: <?php echo $repo->language; ?><br>
                <a href="<?php echo $repo->html_url; ?>"><button>Ver</button></a><br><hr>
            <?php endforeach; ?>

        <?php
        }

        public function form($instance){
            $user = $instance['user'];
            $qtd = $instance['qtd'];

        ?>
            <h4>Widgets: </h4>
            <input type="text" name="" id="">
        <?php
        }
    }