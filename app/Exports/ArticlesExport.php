<?php
namespace App\Exports;
use App\Models\Articles;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ArticlesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Articles::select("id", "design", "categorie", "puv", "unite", "image", "quantite", "description")->get();
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["id", "design", "categorie", "puv", "unite", "image", "quantite", "description"];
    }
}