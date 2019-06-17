@extends('layouts.principal_admin')
@section('content')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Unidades de Atendimento da Receita Federal</h1>

        </div>

    </div>
    <div class="row">
        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="title">Buscar por:</h3>
                </div>
                <div class="tile-body ">
                    <select class="form-control " id="unit">
                        <optgroup label="Selecione Unidade">

                            <option value="name">Unidade</option>
                            <option value="place">Logradouro</option>
                            <option value="neighborhood">Bairro</option>
                            <option value="city">Cidade</option>
                        </optgroup>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label pt-3">Por palavra chave:</label>
                    <input class="form-control" type="text" id="txtSearch" name="txtSearch" value=""
                           placeholder="Buscar...">
                </div>

                <div class="tile-footer">
                    <button class="btn btn-primary" onclick="getUnitsJson(document.getElementById('txtSearch').value)"
                            value="" type="button">Buscar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div id="results" style="display: none;"></div>


@endsection
