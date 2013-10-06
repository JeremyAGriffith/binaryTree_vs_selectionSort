<?php 
/*	    _   ______  ____  ______
	   / | / / __ \/ __ \/ ____/
	  /  |/ / / / / / / / __/   
	 / /|  / /_/ / /_/ / /___   
	/_/ |_/\____/_____/_____/   
*/	                            
class Node
{
	public $value;
	public $count;
	public $left;
	public $right;

	function __construct($value)
	{
		$this->value = $value;
		$this->count = 1;
		$this->left = NULL;
		$this->right = NULL;
	}
}

/*	    ____  _____   _____    ______  ____________  ____________
	   / __ )/  _/ | / /   |  / __ \ \/ /_  __/ __ \/ ____/ ____/
	  / __  |/ //  |/ / /| | / /_/ /\  / / / / /_/ / __/ / __/   
	 / /_/ // // /|  / ___ |/ _, _/ / / / / / _, _/ /___/ /___   
	/_____/___/_/ |_/_/  |_/_/ |_| /_/ /_/ /_/ |_/_____/_____/   
*/	                                                             
class BinaryTree
{
	public $head;

	public function insertNode($value)
	{
		$node = new Node($value);
		if ($this->head === NULL){
			$this->head = $node;
		} else{
			$next_node = $this->head;
			$is_placed = false;
			do{
				if ($next_node->value === $node->value){
					$next_node->count++;
					$is_placed = true;
				} elseif ($node->value > $next_node->value){
					if ($next_node->right === NULL){
						$next_node->right = $node;
						$is_placed = true;
					} else
						$next_node = $next_node->right;
				} else{
					if ($next_node->left === NULL){
						$next_node->left = $node;
						$is_placed = true;
					} else
						$next_node = $next_node->left;
				}
			} while (!$is_placed);
		}

		return $this;
	}

	static function displayValues($node)
	{
		if ($node != NULL){
			BinaryTree::displayValues($node->left);
			for ($i=0; $i<$node->count; $i++)
				echo $node->value.", ";
			echo "<br />";
			BinaryTree::displayValues($node->right);
		}
	}
}

$binary_tree = new BinaryTree();
for ($j=100000;$j>0;$j-=11){
	$binary_tree->insertNode(($j%5)+1);
}
// $binary_tree->insertNode(3)->insertNode(2)->insertNode(5)->insertNode(1)->insertNode(4);
BinaryTree::displayValues($binary_tree->head);
// var_dump($binary_tree);

?>