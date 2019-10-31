<?php

use App\Models\RIR;
use App\Models\Type;
use Faker\Generator as Faker;
use App\Models\RIRDocumentCheck;

$factory->define(RIRDocumentCheck::class, function (Faker $faker) {

    return [
        'rir_id' => function () {
            return RIR::get()->random()->id;
        },
        'general_document'=> function (array $data) {
            return Type::ofRIRGeneralDocument()->get()->random()->id;
        },
        'technical_document'=> function (array $data) {
            return Type::ofRIRTechnicalDocument()->get()->random()->id;
        },
    ];

});
