<?php
class AjaxAction extends Action
{
    public function index()
    {
        $this->redirect('Index/index');
    }

    public function ajax()
    {
        if (isset($_GET['member'])) {
            $id = $_GET['member'];
            $this->ajaxReturn($this->member($id));
        } elseif (isset($_GET['year'])) {
            $year = $_GET['year'];
            $dept_id = $_GET['department'];
            $this->ajaxReturn($this->year($year, $dept_id));
        } elseif (isset($_GET['department'])) {
            $dept_id = $_GET['department'];
            $this->ajaxReturn($this->dept($dept_id));
        } else {
            echo "Wrong parameter!";
        }
    }

    private function member($id) //根据成员id获取详细信息

    {
        $member = M('member')->where('id=' . $id)->getField('id,name,imgurl,introduce'); //TP返回的结果是数组套数组
        $member = $member[$id]; //所以用id把数组解开一层
        array_shift($member); //然后把辅助用的id移出去
        return $member; //返回数组
    }



    
}
