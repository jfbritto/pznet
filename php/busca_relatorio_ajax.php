<?php



    include('config.php');

    //fim da conexão com o banco de dados

    $data = $_POST['data'];

    // if (!isset($_POST['nome'])) {
    //   $nome = 'x';
    // }

    // if (isset($_POST['nome'])) {
    //   $nome = $_POST['nome'];
    // }

    
    $query = mysqli_query($conexao, "SELECT * FROM clientes where cliente like \"$data%\" or codigo = \"$data\" ORDER BY cliente ASC");
    $row = mysqli_num_rows($query);

    ?>
    <section class="panel col-lg-9" style="width: 100%">

        <header class="panel-heading">
<!--             Dados da busca: -->
        </header>
        <?php if($row>0){ ?>

           <table class="table table-hover table-striped table-bordered">
              <thead>
                <tr class="titulo" bgcolor="white">
                  <th></th>
                  <th>NOME</th>
                  <th>CÓDIGO</th>
                  <th class="hidden-xs">DATA</th>
                  <th class="hidden-xs">TEL</th>
                  <th class="text-center">AÇÕES</th>
                </tr>
              </thead>
              <tbody>
           <?php while($result = mysqli_fetch_assoc($query)){ ?>
           <tr>   
                    <td><button style="width: 30px" type="button" class="btn btn-info btn-xs" data-toggle="popover" title="Descrição" data-content="<?php echo $result['servico1'] . " - "; echo $result['servico2'] . " - "; echo $result['servico3'] . " -> "; echo $result['total']; ?>" data-placement="top" data-trigger="hover"><span class="glyphicon glyphicon-info-sign"></span></button></td>

                    <td style="vertical-align:middle"><?php echo $result['cliente']; ?></td>
                    <td style="vertical-align:middle"><?php echo $result['codigo']; ?></td>
                    <td class="hidden-xs" style="vertical-align:middle"><?php echo date('d/m/Y',  strtotime($result['data'])); ?></td>
                    <td class="hidden-xs" style="vertical-align:middle"><?php echo $result['tel']; ?></td>
                    
                    <td width="300">
                    <a class="btn btn-primary btn-sm" href="novo_cadastro.php?id=<?php echo $result['id']; ?>">Novo</a>
                    <a class="btn btn-success btn-sm" href="php/gerador.php?id=<?php echo base64_encode($result['id']); ?>" onclick="window.open(this.href,'galeria','width=680,height=470'); return false;">Gerar PDF</a>
                    <a class="btn btn-warning btn-sm" href="editar.php?place=relatorio&id=<?php echo base64_encode($result['id']);?>">Alterar</a>

                    <a class="btn btn-danger btn-sm" onClick="confirmacao(<?php echo $result['id'];?>)">Deletar</a>

                    <!-- <a class="btn btn-danger btn-sm" href="php/deletar.php?id=<?php echo $result['id'];?>">Deletar</a> --></td>
            </tr>         
           <?php }?>
              </tbody>
            </table>  

        <?php }else{ ?>

            <h4 class="text-center" style="color: red">Nao foram encontrados registros.</h4>

        <?php }?>
    </section>

    <script type="text/javascript">
      $(document).ready(function(){
          $('[data-toggle="popover"]').popover();   
      });
    </script>