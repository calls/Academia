
  <?php
    require 'banco.php';
    include '/includes/header.php';
    $turmas = $Banco->query("
SELECT 
  turmas.*, 
  professores.NOME AS PROFESSOR_NOME,
  modalidades.DESCRICAO AS MOD_DESCRICAO,
  dias_semana.DESCRICAO AS DIA_COD
FROM 
  turmas 
  JOIN professores 
    ON (turmas.CODPROFESSOR = professores.CODPROFESSOR)
  JOIN modalidades
    ON (turmas.CODMODALIDADE = modalidades.CODMODALIDADE)
  JOIN dias_semana
    ON (turmas.CODDIA = dias_semana.CODDIA);");
  ?>
  
  <div id="turmas">
    <h2>Turmas</h2>
    <table>
      <tr>
        <th>Codigo</th>
        <th>Descrição</th>
        <th>Dia</th>
        <th>Horario</th>
        <th>Maximo de vagas</th>
        <th>Modalidade</th>
        <th>Professor</th>
      </tr>
<?php if ($turmas != 0) foreach($turmas as $turma): ?>
      <tr>
        <td><?php echo $turma['CODTURMA']; ?></td>
        <td><?php echo $turma['DESCRICAO']; ?></td>
        <td><?php echo $turma['DIA_COD']; ?></td>
        <td><?php echo $turma['HORA_INICIO']; ?></td>
        <td><?php echo $turma['MAX_VAGAS']; ?></td>
        <td><?php echo $turma['MOD_DESCRICAO']; ?></td>
        <td><?php echo $turma['PROFESSOR_NOME']; ?></td>
        <td><a href="excluir_turma.php?codigo=<?php echo $turma['CODTURMA']; ?>">delete</a></td>
        <td><a href="up_turma.php?codigo=<?php echo $turma['CODTURMA']; ?>">atualizar</a></td>
      </tr>
<?php endforeach; ?>
    </table>
    <a class="new" href="cad_turma.php">Cadastrar uma Turma</a>
  </div>
<?php
  include '/includes/footer.php';
?>