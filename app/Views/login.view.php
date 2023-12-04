<?php componente('topo')?>
  <main class="principal">
    
  <div class="nav-alternativa">
        <a class="btn-voltar" href="<?=linkrota()?>">
          <i class="fa-solid fa-chevron-left"></i>
            Voltar
        </a>     
      </div>
    
    
    <?=flash();?>
     
     
    <div class="form-container">
        <form id="login-form" action="<?=linkrota('autentica')?>" method="post">
          <h2><i class="fa-solid fa-key"></i> Login</h2>
          <input type="text" placeholder="usuario" name="login">
          <input type="password" placeholder="Senha" name="senha">
          <button class="btn">
            <i class="fa-solid fa-unlock"></i>
            Login
          </button>
          <a href="<?=linkrota('criarconta')?>" class="btn verde-claro">
            <i class="fa fa-user" aria-hidden="true"></i>
            Criar Conta
          </a>
        </form>
     </div>


  </main>
<?php componente('rodape')?>