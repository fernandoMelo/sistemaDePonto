<script src="<?php echo base_url('includes/my_js/script.js') ?>"></script>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title" id="menu">
                    <span id="menutitle" class=""><?php echo IconsUtil::getIcone(IconsUtil::ICON_TH_LIST) . ' '; ?> Menu </span>
                </h3>  
            </div>
            <div class="panel-body" id="divclose">
                <div class="panel panel-success">
                    <!-- Default panel contents -->
                    <div class="panel-heading"> <h3 class="panel-title">  <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>  Funcionário</div> </h3>
                    <!-- List group -->
                    <ul>
                        <li><?php echo anchor('Funcionario/create', 'Funcionário') ?></li>
                        <li><?php echo anchor('Funcionario/retrieve', 'Listar') ?></li>
                        <li><?php echo anchor('Funcionario/update/'.$this->session->funcionarioid, 'Editar') ?></li>
                    </ul>
                </div>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Cadastrar Ponto</h3>
                    </div>
                    <div>
                        <ul>
                            <li><?php echo anchor('Ponto/create', 'Cadastrar Ponto' ) ?></li>
                            <li><?php echo anchor('Ponto/retrieve', 'Listar Ponto(s)' ) ?></li>    
                        </ul>
                    </div>
                </div>
            </div>
        </div> 	
    </div>
    <div class="col-md-9">
