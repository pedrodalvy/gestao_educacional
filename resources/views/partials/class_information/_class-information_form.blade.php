<div class="form-group">
    <label for="date_start">Data Início</label>
    <input type="date" class="form-control" id="date_start" name="date_start" value="{{ old('date_start', $classInformation->date_start) }}">
</div>

<div class="form-group">
    <label for="date_end">Data Fim</label>
    <input type="date" class="form-control" id="date_end" name="date_end" value="{{ old('date_end', $classInformation->date_end) }}">
</div>

<div class="form-group">
    <label for="cycle">Ciclo</label>
    <input type="text" class="form-control" id="cycle" name="cycle" value="{{ old('cycle', $classInformation->cycle) }}">
</div>

<div class="form-group">
    <label for="subdivision">Turma</label>
    <input type="text" class="form-control" id="subdivision" name="subdivision" value="{{ old('subdivision', $classInformation->subdivision) }}">
</div>

<div class="form-group">
    <label for="semester">Semestre</label>
    <input type="text" class="form-control" id="semester" name="semester" value="{{ old('semester', $classInformation->semester) }}">
</div>

<div class="form-group">
    <label for="year">Ano</label>
    <input type="text" class="form-control" id="year" name="year" value="{{ old('year', $classInformation->year) }}">
</div>