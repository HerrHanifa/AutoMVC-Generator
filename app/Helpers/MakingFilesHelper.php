<?php 
namespace App\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class MakingFilesHelper 
{
public function convertClosureToString(\Closure $closure)
    {
        $reflection = new \ReflectionFunction($closure);
        $file = new \SplFileObject($reflection->getFileName());
        $file->seek($reflection->getStartLine() - 1);
        $code = '';
        while ($file->key() < $reflection->getEndLine()) {
            $code .= $file->current();
            $file->next();
        }
        $code = trim(preg_replace('/^.*function[^\{]*\{/', '', rtrim($code)));
        $code = preg_replace('/\}[^\}]*$/', '', $code);
        return $code;
    }

    private function getFunctionContent($functionName)
    {
        // جلب اسم الكلاس الكامل الذي يحتوي على الدالة
        $className = "App\\Helpers\\ControllerFunctions\\{$functionName}Function";
    
        // استخدام ReflectionClass لجلب تفاصيل الكلاس
        $reflection = new \ReflectionClass($className);
        
        // استخدام ReflectionMethod لجلب تفاصيل الدالة
        $method = $reflection->getMethod($functionName);
        $methodContent = $this->getMethodContent($method);
        
        // جلب التوقيع الكامل للدالة
        $signature = $this->getFunctionSignature($method);
    
        // دمج التوقيع وجسم الدالة
        return <<<EOD
    {$signature}
    {
        {$methodContent}
    }
    EOD;
    }
    
    // دالة لمساعدتك في الحصول على محتوى الدالة
    private function getMethodContent(\ReflectionMethod $method)
    {
        $file = new \SplFileObject($method->getFileName());
        $file->seek($method->getStartLine() - 1);
        $code = '';
        while ($file->key() < $method->getEndLine()) {
            $code .= $file->current();
            $file->next();
        }
        $code = trim(preg_replace('/^.*function[^\{]*\{/', '', rtrim($code)));
        $code = preg_replace('/\}[^\}]*$/', '', $code);
        return $code;
    }
    
    // دالة للحصول على التوقيع الكامل للدالة
    private function getFunctionSignature(\ReflectionMethod $method)
    {
        $parameters = [];
        foreach ($method->getParameters() as $param) {
            $type = $param->getType();
            $type = $type ? $type . ' ' : '';
            $parameters[] = $type . '$' . $param->getName();
        }
        $params = implode(', ', $parameters);
        return "public function {$method->getName()}({$params})";
    }
    

}




?>