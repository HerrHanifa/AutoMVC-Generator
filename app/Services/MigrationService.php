<?php
namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MigrationService
{
    public static function generateMigrationContent($modelName, $fields, $relationships=null)
    {
      
        $fieldsContent = self::generateFieldsContent($fields);
        $relationshipsContent = self::generateRelationshipsContent($relationships);

        $migrationContent = <<<EOD
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
};
EOD;

        // تحديد مسار الملف
        $filePath = database_path('migrations/' . date('Y_m_d_His') . '_create_' . Str::snake(Str::pluralStudly($modelName)) . '_table.php');

        // كتابة المحتوى إلى الملف
        File::put($filePath, $migrationContent);


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
        if ($relationships) {
        foreach ($relationships as $relationship) {
            $content .= "\$table->foreignId('{$relationship['foreign_key']}')->constrained('{$relationship['references_table']}')->onDelete('{$relationship['on_delete']}');\n";
        }
    }
        return $content;
    }
}

?>