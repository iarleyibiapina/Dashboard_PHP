<table id="datatablesSimple">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach($funcionarios as $funcionario): ?>
        <tr>
            <td><?=$funcionario['nome']?></td>
            <td><?=$funcionario['posicao']?></td>
            <td><?=$funcionario['escritorio']?></td>
            <td><?=$funcionario['idade']?></td>
            <td><?=$funcionario['data_inicio']?></td>
            <td><?=$funcionario['salario']?></td>
        </tr>
        <?php endforeach; ?>
    </tbody> 
</table>