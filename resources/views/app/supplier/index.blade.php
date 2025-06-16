<h3> Supplier </h3>

Fornecedor: {{ $suppliers[0]['nome'] }}
<br>
Status: {{ $suppliers[0]['status'] }}
<br>
@if($suppliers[0]['status'] == 'N')
    Fornecedor inativo
@endif