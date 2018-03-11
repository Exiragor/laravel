<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\GroupResource;
use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypesController extends Controller
{
    public function index()
    {
        $types = Type::active()->get();
        $types->load('group');

        return TypeResource::collection($types);
    }
}
