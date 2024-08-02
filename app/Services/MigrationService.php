<?php
namespace App\Services;

class MigrationService
{
    public static function generateMigrationContent($modelName, $fields, $relationships)
    {
      
        $fieldsContent = self::generateFieldsContent($fields);
        $relationshipsContent = self::generateRelationshipsContent($relationships);

        return <<<EOD
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create{$modelName}Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('{$modelName}', function (Blueprint \$table) {
            \$table->id();
            {$fieldsContent}
            {$relationshipsContent}
            \$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('{$modelName}');
    }
}
EOD;
    }

    private static function generateFieldsContent($fields)
    {
        $content = '';
        foreach ($fields as $field) {
            $nullable = isset($field['nullable']) && $field['nullable'] ? '->nullable()' : '';
            $content .= "\$table->{$field['type']}('{$field['name']}'){$nullable};\n";
        }
        return $content;
    }

    private static function generateRelationshipsContent($relationships)
    {
        $content = '';
        foreach ($relationships as $relationship) {
            $content .= "\$table->foreignId('{$relationship['foreign_key']}')->constrained('{$relationship['references_table']}')->onDelete('{$relationship['on_delete']}');\n";
        }
        return $content;
    }
}

?>