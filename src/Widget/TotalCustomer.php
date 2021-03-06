<?php
namespace AvoRed\Framework\Widget;

use AvoRed\Framework\Database\Contracts\ConfigurationModelInterface;
use Illuminate\Support\Carbon;

class TotalCustomer
{

    /**
     * Widget View Path
     * @var string $view
     */

    protected $view = "avored::widget.total-customer";

    /**
     * Widget Label
     * @var string $view
     */

    protected $label = 'Total Customer';

    /**
     * Widget Type
     * @var string $view
     */

    protected $type = "cms";

    /**
     * Widget unique identifier
     * @var string $identifier
     */
    protected $identifier = "avored-total-customer";

    public function view()
    {
        return $this->view;
    }

    /*
     * Widget unique identifier
     *
     */
    public function identifier()
    {
        return $this->identifier;
    }

    /*
    * Widget unique identifier
    *
    */
    public function label()
    {
        return $this->label;
    }

    /*
    * Widget unique identifier
    *
    */
    public function type()
    {
        return $this->type;
    }

    /**
     * View Required Parameters
     *
     * @return array
     */
    public function with()
    {
        $userModel = $this->getUserModel();
        $firstDay = $this->getFirstDay();
        $value = $userModel->select('id')->where('created_at', '>', $firstDay)->count();
        
        return ['value' => $value];
    }

    public function render()
    {
        return view($this->view(), $this->with());
    }

    private function getFirstDay()
    {
        $startDay = Carbon::now();
        return $startDay->firstOfMonth();
    }

    private function getUserModel()
    {
        $model = config('avored.model.user');
        return new $model;
    }
}
