<?php 
class DeleteCommand  implements iCommand
{
    public function __construct(Article $arcticle)
    {
        $this->article = $arcticle;
    }

    public function exect()
    {
         $this->article->delete();
    }
}
?>