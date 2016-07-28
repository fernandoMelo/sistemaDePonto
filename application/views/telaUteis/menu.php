	<nav class="navbar navbar-inverse navbar-fixed ">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Sistema de Ponto</a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		          </ul>
		        </li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		      <!--  <li><a href="#"><?php echo IconsUtil::getIcone(IconsUtil::ICON_INFO_SING) . ' '; ?> Ajuda</a></li> -->
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              <?php echo $this->session->nome; ?> <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><?php echo anchor('Funcionario/update/'.$this->session->funcionarioid, IconsUtil::getIcone(IconsUtil::ICON_PENCIL).' Editar Dados') ?></li>
		            <li><a href="#"><?php echo IconsUtil::getIcone(IconsUtil::ICON_COG); ?> Configurações</a></li>
		            <li class="divider"></li>
		            <li><?php echo anchor('Funcionario/logout', IconsUtil::getIcone(IconsUtil::ICON_OFF).' Sair') ?></li>
		          </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
                
