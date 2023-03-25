<?php
declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

use App\Models\Fibo as Model;
use function PHPUnit\Framework\isInstanceOf;

class FiboRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getModelClass(): string
    {
        return Model::class;
    }

    public function createFibo(int $fibo, string $value): bool
    {
        try {
            DB::beginTransaction();

            $created = $this->startConditions()
                ->create([
                    'fibo' => $fibo,
                    'value' => $value
                ]);

            if ($created instanceof Model) {
                DB::commit();
                $result = true;
            } else {
                DB::rollBack();
                $result = false;
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            $result = false;
        }

        return $result;
    }
}
