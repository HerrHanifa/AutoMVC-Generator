<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class ModelService
{
    /**
     * إنشاء موديل ديناميكي بناءً على اسم الجدول، الحقول المعبأة، الأعمدة المخفية، والعلاقات
     *
     * @param string $tableName
     * @param array $fillable
     * @param array $hidden
     * @param array $relations
     * @return void
     */
    public function createModel($tableName, $columns = [], $hidden = null, $relations = null)
    {
        $fillable = $columns ? "['" . implode("', '", $columns) . "']" : "[]";
        $hiddenFields = $hidden ? "['" . implode("', '", $hidden) . "']" : "[]";


        // تحويل اسم الجدول إلى اسم موديل
        $modelName= ucfirst(Str::camel($tableName));

        // مسار ملف الموديل
        $modelPath = app_path("Models/{$modelName}.php");

        // محتوى الموديل
        $modelTemplate = <<<EOD
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class {$modelName} extends Model
{
      protected \$table = '{$tableName}';
    protected \$fillable = {$fillable};
    protected \$hidden = {$hiddenFields};

    {$this->generateRelations($relations)}
}
EOD;

        // إنشاء ملف الموديل
        File::put($modelPath, $modelTemplate);
    }

    /**
     * إنشاء نص العلاقات للموديل
     *
     * @param array $relations
     * @return string
     */
    private function generateRelations($relations=null)
    {
        $relationMethods = '';
if($relations){
        foreach ($relations as $relation) {
            $relationMethods .= $this->generateRelationMethod($relation);
        }
    }
        return $relationMethods;
    }

    /**
     * إنشاء نص دالة علاقة معينة
     *
     * @param array $relation
     * @return string
     */
    private function generateRelationMethod($relation)
    {
        $type = $relation['type'];
        $name = $relation['name'];
        $model = $relation['model'];

        return <<<EOD

    public function {$name}()
    {
        return \$this->{$type}({$model}::class);
    }
EOD;
    }
}

<<<EOD
مثال على Api:
{
    "table_name": "posts",
    "fillable": ["title", "content", "user_id"],
    "hidden": ["created_at", "updated_at"],
    "relations": [
        {
            "type": "belongsTo",
            "name": "user",
            "model": "App\\Models\\User"
        },
        {
            "type": "hasMany",
            "name": "comments",
            "model": "App\\Models\\Comment"
        }
    ]
}

EOD;
