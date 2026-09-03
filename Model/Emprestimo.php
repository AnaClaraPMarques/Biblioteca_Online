  <?php
  
  class EmprestimoController
{
  public function realizar($id_emprestimo, $isbn, $id_usuario, $data_emprestimo, $data_devolucao) {
    $sql = "INSERT INTO emprestimo (id_emprestimo, isbn, id_usuario, data_emprestimo, data_devolucao)
            VALUES (:id_emprestimo, :isbn, :id_usuario, :data_emprestimo, :data_devolucao)";

    $stmt = $this->connection->prepare($sql);

    $stmt->execute([
        ':id_emprestimo' => $id_emprestimo,
        ':isbn' => $isbn,
        ':id_usuario' => $id_usuario,
        ':data_emprestimo' => $data_emprestimo,
        ':data_devolucao' => $data_devolucao
    ]);
}
}