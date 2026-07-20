@extends('layouts.main')

@section('title', 'Skema Asesmen')

@section('content')
    <div class="pb-5">
        <div class="kt-container-fixed flex items-center justify-between flex-wrap gap-3">
            <div class="flex items-center flex-wrap gap-1 lg:gap-5">
                <h1 class="font-medium text-lg text-mono">Skema Asesmen</h1>
                <div class="flex items-center gap-1 text-sm font-normal">
                    <a class="text-secondary-foreground hover:text-primary" href="{{ route('home') }}">Home</a>
                    <span class="text-muted-foreground text-sm">/</span>
                    <span class="text-secondary-foreground">Master Data README</span>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-container-fixed space-y-5 lg:space-y-7.5 pb-10">
        @include('partials.alerts')

        <div class="kt-card" id="organizations">
            <div class="kt-card-header">
                <h3 class="kt-card-title">Organizations</h3>
            </div>
            <div class="kt-card-content grid gap-6 lg:grid-cols-2">
                <form action="{{ route('admin.assessment-schema.organizations.store') }}" method="POST" class="grid gap-4">
                    @csrf
                    <input class="kt-input" type="text" name="name" placeholder="Nama organisasi" value="{{ old('name') }}" required>
                    <select class="kt-select" name="type" required>
                        <option value="">Pilih tipe</option>
                        <option value="education" @selected(old('type') === 'education')>Education</option>
                        <option value="corporate" @selected(old('type') === 'corporate')>Corporate</option>
                    </select>
                    <textarea class="kt-textarea" name="settings" rows="4" placeholder='{"branding":"default"}'>{{ old('settings') }}</textarea>
                    <div class="flex justify-end">
                        <button class="kt-btn kt-btn-primary" type="submit">Simpan organisasi</button>
                    </div>
                </form>

                <div class="overflow-x-auto">
                    <table class="kt-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tipe</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($organizations as $organization)
                                <tr>
                                    <td>{{ $organization->name }}</td>
                                    <td>{{ $organization->type }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('admin.assessment-schema.organizations.destroy', $organization) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="kt-btn kt-btn-sm kt-btn-destructive" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted-foreground">Belum ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="grid gap-5 lg:grid-cols-2">
            <div class="kt-card" id="frameworks">
                <div class="kt-card-header">
                    <h3 class="kt-card-title">Frameworks</h3>
                </div>
                <div class="kt-card-content grid gap-4">
                    <form action="{{ route('admin.assessment-schema.frameworks.store') }}" method="POST" class="grid gap-4">
                        @csrf
                        <input class="kt-input" type="text" name="name" placeholder="Nama framework" value="{{ old('name') }}" required>
                        <select class="kt-select" name="context" required>
                            <option value="">Pilih konteks</option>
                            <option value="education">Education</option>
                            <option value="corporate">Corporate</option>
                            <option value="both">Both</option>
                        </select>
                        <input class="kt-input" type="text" name="version" placeholder="Versi" value="{{ old('version') }}">
                        <input class="kt-input" type="text" name="status" placeholder="Status" value="{{ old('status', 'draft') }}" required>
                        <textarea class="kt-textarea" name="description" rows="3" placeholder="Deskripsi">{{ old('description') }}</textarea>
                        <textarea class="kt-textarea" name="theoretical_basis" rows="3" placeholder="Landasan teori">{{ old('theoretical_basis') }}</textarea>
                        <div class="flex justify-end">
                            <button class="kt-btn kt-btn-primary" type="submit">Simpan framework</button>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="kt-table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Konteks</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($frameworks as $framework)
                                    <tr>
                                        <td>{{ $framework->name }}</td>
                                        <td>{{ $framework->context }}</td>
                                        <td class="text-end">
                                            <form action="{{ route('admin.assessment-schema.frameworks.destroy', $framework) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="kt-btn kt-btn-sm kt-btn-destructive" type="submit">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted-foreground">Belum ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="kt-card" id="constructs">
                <div class="kt-card-header">
                    <h3 class="kt-card-title">Constructs</h3>
                </div>
                <div class="kt-card-content grid gap-4">
                    <form action="{{ route('admin.assessment-schema.constructs.store') }}" method="POST" class="grid gap-4">
                        @csrf
                        <select class="kt-select" name="framework_id">
                            <option value="">Tanpa framework</option>
                            @foreach ($frameworks as $framework)
                                <option value="{{ $framework->id }}">{{ $framework->name }}</option>
                            @endforeach
                        </select>
                        <select class="kt-select" name="parent_id">
                            <option value="">Tanpa parent</option>
                            @foreach ($constructs as $construct)
                                <option value="{{ $construct->id }}">{{ $construct->code }} - {{ $construct->name }}</option>
                            @endforeach
                        </select>
                        <div class="grid gap-4 md:grid-cols-2">
                            <select class="kt-select" name="level" required>
                                <option value="">Pilih level</option>
                                <option value="construct">Construct</option>
                                <option value="dimension">Dimension</option>
                                <option value="indicator">Indicator</option>
                            </select>
                            <select class="kt-select" name="direction">
                                <option value="">Tanpa direction</option>
                                <option value="unidimensional">Unidimensional</option>
                                <option value="index">Index</option>
                            </select>
                        </div>
                        <div class="grid gap-4 md:grid-cols-2">
                            <input class="kt-input" type="text" name="code" placeholder="Kode konstruk" value="{{ old('code') }}" required>
                            <input class="kt-input" type="text" name="name" placeholder="Nama konstruk" value="{{ old('name') }}" required>
                        </div>
                        <div class="grid gap-4 md:grid-cols-2">
                            <input class="kt-input" type="text" name="version" placeholder="Versi" value="{{ old('version') }}">
                            <input class="kt-input" type="text" name="status" placeholder="Status" value="{{ old('status', 'draft') }}" required>
                        </div>
                        <textarea class="kt-textarea" name="conceptual_definition" rows="3" placeholder="Definisi konseptual">{{ old('conceptual_definition') }}</textarea>
                        <textarea class="kt-textarea" name="operational_definition" rows="3" placeholder="Definisi operasional">{{ old('operational_definition') }}</textarea>
                        <div class="flex justify-end">
                            <button class="kt-btn kt-btn-primary" type="submit">Simpan construct</button>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="kt-table">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Level</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($constructs as $construct)
                                    <tr>
                                        <td>{{ $construct->code }}</td>
                                        <td>{{ $construct->name }}</td>
                                        <td>{{ $construct->level }}</td>
                                        <td class="text-end">
                                            <form action="{{ route('admin.assessment-schema.constructs.destroy', $construct) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="kt-btn kt-btn-sm kt-btn-destructive" type="submit">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted-foreground">Belum ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-5 lg:grid-cols-2">
            <div class="kt-card" id="instruments">
                <div class="kt-card-header">
                    <h3 class="kt-card-title">Instruments</h3>
                </div>
                <div class="kt-card-content grid gap-4">
                    <form action="{{ route('admin.assessment-schema.instruments.store') }}" method="POST" class="grid gap-4">
                        @csrf
                        <select class="kt-select" name="organization_id">
                            <option value="">Pustaka bersama</option>
                            @foreach ($organizations as $organization)
                                <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                            @endforeach
                        </select>
                        <input class="kt-input" type="text" name="name" placeholder="Nama instrument" value="{{ old('name') }}" required>
                        <div class="grid gap-4 md:grid-cols-2">
                            <select class="kt-select" name="purpose" required>
                                <option value="selection">Selection</option>
                                <option value="diagnostic">Diagnostic</option>
                                <option value="talent_mgmt">Talent management</option>
                            </select>
                            <select class="kt-select" name="response_model" required>
                                <option value="dichotomous">Dichotomous</option>
                                <option value="polytomous">Polytomous</option>
                                <option value="mixed">Mixed</option>
                            </select>
                        </div>
                        <div class="grid gap-4 md:grid-cols-2">
                            <select class="kt-select" name="default_irt_model" required>
                                <option value="rasch">Rasch</option>
                                <option value="2pl">2PL</option>
                                <option value="3pl">3PL</option>
                                <option value="4pl">4PL</option>
                                <option value="grm">GRM</option>
                                <option value="pcm">PCM</option>
                            </select>
                            <select class="kt-select" name="delivery_default" required>
                                <option value="linear">Linear</option>
                                <option value="cat">CAT</option>
                                <option value="polycat">PolyCAT</option>
                                <option value="questionnaire">Questionnaire</option>
                            </select>
                        </div>
                        <div class="grid gap-4 md:grid-cols-2">
                            <input class="kt-input" type="text" name="version" placeholder="Versi" value="{{ old('version') }}">
                            <input class="kt-input" type="text" name="status" placeholder="Status" value="{{ old('status', 'draft') }}" required>
                        </div>
                        <div class="flex justify-end">
                            <button class="kt-btn kt-btn-primary" type="submit">Simpan instrument</button>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="kt-table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Purpose</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($instruments as $instrument)
                                    <tr>
                                        <td>{{ $instrument->name }}</td>
                                        <td>{{ $instrument->purpose }}</td>
                                        <td class="text-end">
                                            <form action="{{ route('admin.assessment-schema.instruments.destroy', $instrument) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="kt-btn kt-btn-sm kt-btn-destructive" type="submit">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted-foreground">Belum ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="kt-card" id="blueprints">
                <div class="kt-card-header">
                    <h3 class="kt-card-title">Blueprints</h3>
                </div>
                <div class="kt-card-content grid gap-4">
                    <form action="{{ route('admin.assessment-schema.blueprints.store') }}" method="POST" class="grid gap-4">
                        @csrf
                        <select class="kt-select" name="instrument_id" required>
                            <option value="">Pilih instrument</option>
                            @foreach ($instruments as $instrument)
                                <option value="{{ $instrument->id }}">{{ $instrument->name }}</option>
                            @endforeach
                        </select>
                        <input class="kt-input" type="text" name="name" placeholder="Nama blueprint" value="{{ old('name') }}" required>
                        <div class="grid gap-4 md:grid-cols-2">
                            <input class="kt-input" type="text" name="version" placeholder="Versi" value="{{ old('version') }}">
                            <input class="kt-input" type="text" name="status" placeholder="Status" value="{{ old('status', 'draft') }}" required>
                        </div>
                        <div class="flex justify-end">
                            <button class="kt-btn kt-btn-primary" type="submit">Simpan blueprint</button>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="kt-table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Instrument</th>
                                    <th>Cells</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($blueprints as $blueprint)
                                    <tr>
                                        <td>{{ $blueprint->name }}</td>
                                        <td>{{ $blueprint->instrument?->name }}</td>
                                        <td>{{ $blueprint->blueprint_cells_count }}</td>
                                        <td class="text-end">
                                            <form action="{{ route('admin.assessment-schema.blueprints.destroy', $blueprint) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="kt-btn kt-btn-sm kt-btn-destructive" type="submit">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted-foreground">Belum ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-5 lg:grid-cols-2">
            <div class="kt-card" id="blueprint-cells">
                <div class="kt-card-header">
                    <h3 class="kt-card-title">Blueprint Cells</h3>
                </div>
                <div class="kt-card-content grid gap-4">
                    <form action="{{ route('admin.assessment-schema.blueprint-cells.store') }}" method="POST" class="grid gap-4">
                        @csrf
                        <select class="kt-select" name="blueprint_id" required>
                            <option value="">Pilih blueprint</option>
                            @foreach ($blueprints as $blueprint)
                                <option value="{{ $blueprint->id }}">{{ $blueprint->name }}</option>
                            @endforeach
                        </select>
                        <select class="kt-select" name="construct_id" required>
                            <option value="">Pilih construct</option>
                            @foreach ($constructs as $construct)
                                <option value="{{ $construct->id }}">{{ $construct->code }} - {{ $construct->name }}</option>
                            @endforeach
                        </select>
                        <div class="grid gap-4 md:grid-cols-2">
                            <input class="kt-input" type="text" name="cognitive_level" placeholder="Cognitive level" value="{{ old('cognitive_level') }}">
                            <input class="kt-input" type="number" name="target_item_count" min="1" placeholder="Target item count" value="{{ old('target_item_count') }}" required>
                        </div>
                        <div class="grid gap-4 md:grid-cols-3">
                            <input class="kt-input" type="number" step="0.01" name="target_difficulty_min" placeholder="Difficulty min" value="{{ old('target_difficulty_min') }}">
                            <input class="kt-input" type="number" step="0.01" name="target_difficulty_max" placeholder="Difficulty max" value="{{ old('target_difficulty_max') }}">
                            <input class="kt-input" type="number" step="0.01" min="0" name="weight" placeholder="Weight" value="{{ old('weight', 1) }}" required>
                        </div>
                        <div class="flex justify-end">
                            <button class="kt-btn kt-btn-primary" type="submit">Simpan blueprint cell</button>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="kt-table">
                            <thead>
                                <tr>
                                    <th>Blueprint</th>
                                    <th>Construct</th>
                                    <th>Target</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($blueprintCells as $blueprintCell)
                                    <tr>
                                        <td>{{ $blueprintCell->blueprint?->name }}</td>
                                        <td>{{ $blueprintCell->construct?->code }} - {{ $blueprintCell->construct?->name }}</td>
                                        <td>{{ $blueprintCell->target_item_count }}</td>
                                        <td class="text-end">
                                            <form action="{{ route('admin.assessment-schema.blueprint-cells.destroy', $blueprintCell) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="kt-btn kt-btn-sm kt-btn-destructive" type="submit">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted-foreground">Belum ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="kt-card" id="forms">
                <div class="kt-card-header">
                    <h3 class="kt-card-title">Forms</h3>
                </div>
                <div class="kt-card-content grid gap-4">
                    <form action="{{ route('admin.assessment-schema.forms.store') }}" method="POST" class="grid gap-4">
                        @csrf
                        <select class="kt-select" name="instrument_id" required>
                            <option value="">Pilih instrument</option>
                            @foreach ($instruments as $instrument)
                                <option value="{{ $instrument->id }}">{{ $instrument->name }}</option>
                            @endforeach
                        </select>
                        <input class="kt-input" type="text" name="name" placeholder="Nama form" value="{{ old('name') }}" required>
                        <div class="grid gap-4 md:grid-cols-2">
                            <select class="kt-select" name="form_type" required>
                                <option value="linear">Linear</option>
                                <option value="cat_pool">CAT Pool</option>
                                <option value="mst">MST</option>
                            </select>
                            <input class="kt-input" type="text" name="status" placeholder="Status" value="{{ old('status', 'draft') }}" required>
                        </div>
                        <div class="grid gap-4 md:grid-cols-2">
                            <input class="kt-input" type="text" name="version" placeholder="Versi" value="{{ old('version') }}">
                            <label class="kt-label flex items-center gap-3 border border-input rounded-md px-4 py-3">
                                <input type="checkbox" name="is_operational" value="1" @checked(old('is_operational'))>
                                <span>Operational form</span>
                            </label>
                        </div>
                        <div class="flex justify-end">
                            <button class="kt-btn kt-btn-primary" type="submit">Simpan form</button>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="kt-table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tipe</th>
                                    <th>Operational</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($forms as $form)
                                    <tr>
                                        <td>{{ $form->name }}</td>
                                        <td>{{ $form->form_type }}</td>
                                        <td>{{ $form->is_operational ? 'Yes' : 'No' }}</td>
                                        <td class="text-end">
                                            <form action="{{ route('admin.assessment-schema.forms.destroy', $form) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="kt-btn kt-btn-sm kt-btn-destructive" type="submit">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted-foreground">Belum ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop