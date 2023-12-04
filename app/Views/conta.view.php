<?php componente('topo')?>
  <main class="principal">
  <div class="nav-alternativa">
            <a class="btn-voltar" href="<?=linkrota()?>">
              <i class="fa-solid fa-chevron-left"></i>
                Voltar
            </a>     
  </div> 
    
   <?=flash()?>
    
            
    <div class="form-container">
        <form id="login-form" method="POST" action="<?=linkrota('cadastrarconta')?>">
          <h2><i class="fa-solid fa-user-plus"></i> Criar Conta</h2>
          <input type="text" placeholder="Nome Completo" name="nome" value="<?=getValue('nome')?>">
          <select name="turmas_id">
            <option value="">Selecione a sua turma</option>
            <option value="1" <?=selected('turmas_id',1) ?> >1° Matutino - Informática</option>
            <option value="2" <?=selected('turmas_id',2) ?> >1° Matutino - Edificações</option>
            <option value="3" <?=selected('turmas_id',3) ?> >1° Vespertino - Informática</option>
            <option value="4" <?=selected('turmas_id',4) ?> >1° Vespertino - Edificações</option>

        </select>
        <input type="email" placeholder="Email" name="email" value="<?=getValue('email')?>" >
          <input type="text" placeholder="usuario" name="login" value="<?=getValue('login')?>" >
          <input type="password" placeholder="Senha" name="senha" >         
          <button class="btn">
            <i class="fa-solid fa-circle-plus"></i>
            Criar Conta
          </button>
          <a href="<?=linkrota('login')?>" class="btn verde-claro">
            <i class="fa-solid fa-unlock"></i>
            Voltar e Fazer Login
          </a>
        </form>
     </div>
    
  </main>
<?php componente('rodape')?>