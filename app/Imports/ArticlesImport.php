<?php

namespace App\Imports;

use App\Models\Articles;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;

class ArticlesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Articles([
            'design'     => $row['design'],
            'categorie'    => $row['categorie'],
            'puv'     => $row['puv'],
            'unite'    => $row['unite'],
            'image'     => $row['image'],
            'quantite'    => $row['quantite'],
            'description'     => $row['description']
        ]);
    }
}
