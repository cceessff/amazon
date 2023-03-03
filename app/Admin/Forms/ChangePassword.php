<?php

namespace App\Admin\Forms;

use App\Models\Member;
use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Form implements LazyRenderable
{
    use LazyWidget;

    const PASSWORD_TYPE = [1 => 'password', 2 => 'trade_password'];

    public function __construct($data = [], $key = null)
    {
        parent::__construct($data, $key);
    }

    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {

        $id = $this->payload["id"] ?? 0;
        if (!$id) {
            return $this->response()->error("用户ID参数不存在");
        }
        $passwordType = $input["password_type"];
        $password = $input['password'];
        Member::query()
            ->where("id", '=', $id)
            ->update([self::PASSWORD_TYPE[$passwordType] => Hash::make($password)]);
        return $this
            ->response()
            ->success('Processed successfully.')
            ->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->select("password_type", "密码类型")->options([1 => '登陆密码', 2 => '交易密码'])->required();
        $this->password('password','新密码')->required();
    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default(): array
    {
        return [
            'id' => $this->payload["id"]
        ];
    }


}
