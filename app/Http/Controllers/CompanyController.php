<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);

        return view('companies.index', compact('companies'));
    }

    // Показать форму создания компании
    public function create()
    {
        return view('companies.create');
    }

    // Сохранить новую компанию в базе данных
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'email|nullable',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'website' => 'nullable|url',
        ]);

        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');

        // Сохранение логотипа
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/logos');
            $company->logo = $logoPath;
        }

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Компания успешно создана.');
    }

    // Показать информацию о компании
    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('companies.show', compact('company'));
    }

    // Показать форму редактирования компании
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('companies.edit', compact('company'));
    }

    // Обновить компанию в базе данных
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'email|nullable',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'website' => 'nullable|url',
        ]);

        $company = Company::findOrFail($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');

        // Обновление логотипа
        if ($request->hasFile('logo')) {
            Storage::delete($company->logo); // Удаление предыдущего логотипа
            $logoPath = $request->file('logo')->store('public/logos');
            $company->logo = $logoPath;
        }

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Компания успешно обновлена.');
    }

    // Удалить компанию из базы данных
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        if ($company->logo) {
            Storage::delete($company->logo);
        }
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Компания успешно удалена.');
    }
}
