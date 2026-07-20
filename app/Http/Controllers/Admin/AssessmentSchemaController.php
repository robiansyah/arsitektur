<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blueprint;
use App\Models\BlueprintCell;
use App\Models\Construct;
use App\Models\Form as AssessmentForm;
use App\Models\Framework;
use App\Models\Instrument;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AssessmentSchemaController extends Controller
{
    public function index(): View
    {
        return view('admin.assessment-schema.index', [
            'organizations' => Organization::query()->orderBy('name')->get(),
            'frameworks' => Framework::query()->orderBy('name')->get(),
            'constructs' => Construct::query()
                ->with(['framework:id,name', 'parent:id,name'])
                ->orderBy('code')
                ->get(),
            'instruments' => Instrument::query()
                ->with('organization:id,name')
                ->orderBy('name')
                ->get(),
            'blueprints' => Blueprint::query()
                ->with('instrument:id,name')
                ->withCount('blueprintCells')
                ->orderByDesc('id')
                ->get(),
            'blueprintCells' => BlueprintCell::query()
                ->with(['blueprint:id,name', 'construct:id,code,name'])
                ->orderByDesc('id')
                ->get(),
            'forms' => AssessmentForm::query()
                ->with('instrument:id,name')
                ->orderByDesc('id')
                ->get(),
        ]);
    }

    public function storeOrganization(Request $request): RedirectResponse
    {
        Organization::create($this->validatedOrganization($request));

        return back()->with('success', 'Organisasi berhasil ditambahkan.');
    }

    public function destroyOrganization(Organization $organization): RedirectResponse
    {
        return $this->deleteModel($organization, 'Organisasi');
    }

    public function storeFramework(Request $request): RedirectResponse
    {
        Framework::create($this->validatedFramework($request));

        return back()->with('success', 'Framework berhasil ditambahkan.');
    }

    public function destroyFramework(Framework $framework): RedirectResponse
    {
        return $this->deleteModel($framework, 'Framework');
    }

    public function storeConstruct(Request $request): RedirectResponse
    {
        Construct::create($this->validatedConstruct($request));

        return back()->with('success', 'Construct berhasil ditambahkan.');
    }

    public function destroyConstruct(Construct $construct): RedirectResponse
    {
        return $this->deleteModel($construct, 'Construct');
    }

    public function storeInstrument(Request $request): RedirectResponse
    {
        Instrument::create($this->validatedInstrument($request));

        return back()->with('success', 'Instrument berhasil ditambahkan.');
    }

    public function destroyInstrument(Instrument $instrument): RedirectResponse
    {
        return $this->deleteModel($instrument, 'Instrument');
    }

    public function storeBlueprint(Request $request): RedirectResponse
    {
        Blueprint::create($this->validatedBlueprint($request));

        return back()->with('success', 'Blueprint berhasil ditambahkan.');
    }

    public function destroyBlueprint(Blueprint $blueprint): RedirectResponse
    {
        return $this->deleteModel($blueprint, 'Blueprint');
    }

    public function storeBlueprintCell(Request $request): RedirectResponse
    {
        BlueprintCell::create($this->validatedBlueprintCell($request));

        return back()->with('success', 'Blueprint cell berhasil ditambahkan.');
    }

    public function destroyBlueprintCell(BlueprintCell $blueprintCell): RedirectResponse
    {
        return $this->deleteModel($blueprintCell, 'Blueprint cell');
    }

    public function storeForm(Request $request): RedirectResponse
    {
        AssessmentForm::create($this->validatedForm($request));

        return back()->with('success', 'Form berhasil ditambahkan.');
    }

    public function destroyForm(AssessmentForm $form): RedirectResponse
    {
        return $this->deleteModel($form, 'Form');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedOrganization(Request $request): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:education,corporate'],
            'settings' => ['nullable', 'string'],
        ]);

        $validated['settings'] = $this->decodeJsonField(Arr::get($validated, 'settings'), 'settings');

        return $validated;
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedFramework(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'theoretical_basis' => ['nullable', 'string'],
            'context' => ['required', 'in:education,corporate,both'],
            'version' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'string', 'max:50'],
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedConstruct(Request $request): array
    {
        return $request->validate([
            'framework_id' => ['nullable', 'exists:frameworks,id'],
            'parent_id' => ['nullable', 'exists:constructs,id'],
            'level' => ['required', 'in:construct,dimension,indicator'],
            'code' => ['required', 'string', 'max:100', 'unique:constructs,code'],
            'name' => ['required', 'string', 'max:255'],
            'conceptual_definition' => ['nullable', 'string'],
            'operational_definition' => ['nullable', 'string'],
            'direction' => ['nullable', 'in:unidimensional,index'],
            'version' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'string', 'max:50'],
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedInstrument(Request $request): array
    {
        return $request->validate([
            'organization_id' => ['nullable', 'exists:organizations,id'],
            'name' => ['required', 'string', 'max:255'],
            'purpose' => ['required', 'in:selection,diagnostic,talent_mgmt'],
            'response_model' => ['required', 'in:dichotomous,polytomous,mixed'],
            'default_irt_model' => ['required', 'in:rasch,2pl,3pl,4pl,grm,pcm'],
            'delivery_default' => ['required', 'in:linear,cat,polycat,questionnaire'],
            'version' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'string', 'max:50'],
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedBlueprint(Request $request): array
    {
        return $request->validate([
            'instrument_id' => ['required', 'exists:instruments,id'],
            'name' => ['required', 'string', 'max:255'],
            'version' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'string', 'max:50'],
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedBlueprintCell(Request $request): array
    {
        return $request->validate([
            'blueprint_id' => ['required', 'exists:blueprints,id'],
            'construct_id' => ['required', 'exists:constructs,id'],
            'cognitive_level' => ['nullable', 'string', 'max:100'],
            'target_item_count' => ['required', 'integer', 'min:1'],
            'target_difficulty_min' => ['nullable', 'numeric'],
            'target_difficulty_max' => ['nullable', 'numeric'],
            'weight' => ['required', 'numeric', 'min:0'],
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedForm(Request $request): array
    {
        $validated = $request->validate([
            'instrument_id' => ['required', 'exists:instruments,id'],
            'name' => ['required', 'string', 'max:255'],
            'form_type' => ['required', 'in:linear,cat_pool,mst'],
            'is_operational' => ['nullable', 'boolean'],
            'version' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'string', 'max:50'],
        ]);

        $validated['is_operational'] = $request->boolean('is_operational');

        return $validated;
    }

    private function deleteModel(Model $model, string $label): RedirectResponse
    {
        try {
            $model->delete();

            return back()->with('success', $label.' berhasil dihapus.');
        } catch (QueryException) {
            return back()->withErrors([$label => $label.' masih dipakai oleh data lain.']);
        }
    }

    /**
     * @return array<string, mixed>|null
     */
    private function decodeJsonField(?string $value, string $field): ?array
    {
        if ($value === null || trim($value) === '') {
            return null;
        }

        $decoded = json_decode($value, true);

        if (! is_array($decoded) || json_last_error() !== JSON_ERROR_NONE) {
            throw ValidationException::withMessages([
                $field => 'Format JSON tidak valid.',
            ]);
        }

        return $decoded;
    }
}
