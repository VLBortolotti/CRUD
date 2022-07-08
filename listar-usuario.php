<h1>Listar Usuários</h1>
<?php
    $sql = "SELECT * FROM usuarios";

    $res = $conn->query($sql);

    $qtd = $res->num_rows; // quantidade de usuarios

    if($qtd>0) {

        print "<table class='table table-hover table-striped table-bordered'>";
            print "<tr>";
            print "<th>ID</th>";
            print "<th>Nome</th>";
            print "<th>E-Mail</th>";
            print "<th>Nascimento</th>";
            print "<th>Ações</th>";
            print "</tr>";
        // inserindo cada um dos elementos da query na variavel $row
        while($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>".$row->id."</td>";
            print "<td>".$row->nome."</td>";
            print "<td>".$row->email."</td>";
            print "<td>".$row->data_nasc."</td>";
            print "<td>

                    <button class='btn btn-success' 
                    onclick=\"location.href='?page=editar&id="
                    .$row->id."'\">
                        Editar
                    </button>

                    <button class='btn btn-danger' 
                    onclick=\"location.href='?page=salvar&acao=exluir&id=".$row->id."'\">
                        Excluir
                    </button>

                  </td>";
            print "</tr>";
        }
        print "</table>";

    } else {
        print "<p class='alert alert-danger'>Resultados não encontrados.</p>";
    }
?>