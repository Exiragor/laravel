<?php

namespace App\Http\Controllers\Lottery;

use App\Http\Resources\TypesResource;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function getTypes() {
        $types = Type::where('active', 1)->get();

        return TypesResource::collection($types);
    }
}
