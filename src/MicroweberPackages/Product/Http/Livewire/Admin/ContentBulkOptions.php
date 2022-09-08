<?php

namespace MicroweberPackages\Product\Http\Livewire\Admin;

use Livewire\Component;
use MicroweberPackages\Content\Content;

class ContentBulkOptions extends Component
{
    protected $listeners = [
        'multipleMoveToCategory' => 'multipleMoveToCategoryShowModal',
        'multipleMoveToCategoryExecute' => 'multipleMoveToCategoryExecute',


        'multiplePublish' => 'multiplePublishShowModal',
        'multiplePublishExecute' => 'multiplePublishExecute',

        'multipleUnpublish' => 'multipleUnpublishShowModal',
        'multipleUnpublishExecute' => 'multipleUnpublishExecute',

        'multipleDelete' => 'multipleDeleteShowModal',
        'multipleDeleteExecute' => 'multipleDeleteExecute',
    ];


    // Publish modal
    public $multiplePublishShowModal = false;
    public $multiplePublishIds = [];

    public function multiplePublishShowModal($params)
    {
        $this->multiplePublishIds = $params;
        $this->multiplePublishShowModal = true;
    }

    public function multiplePublishExecute()
    {
        if (!empty($this->multiplePublishIds)) {
            foreach ($this->multiplePublishIds as $publishId) {
                $findContent = Content::where('id', $publishId)->first();
                if ($findContent !== null) {
                    $findContent->is_active = 1;
                    $findContent->save();
                }
            }
        }

        $this->emit('refreshProductsTable');
        $this->multiplePublishShowModal = false;
    }

    // Unpublish modal
    public $multipleUnpublishShowModal = false;
    public $multipleUnpublishIds = [];

    public function multipleUnpublishShowModal($params)
    {
        $this->multipleUnpublishIds = $params;
        $this->multipleUnpublishShowModal = true;
    }

    public function multipleUnpublishExecute()
    {
        if (!empty($this->multipleUnpublishIds)) {
            foreach ($this->multipleUnpublishIds as $unpublishId) {
                $findContent = Content::where('id', $unpublishId)->first();
                if ($findContent !== null) {
                    $findContent->is_active = 0;
                    $findContent->save();
                }
            }
        }

        $this->emit('refreshProductsTable');
        $this->multipleUnpublishShowModal = false;
    }

    // Delete modal
    public $multipleDeleteShowModal = false;
    public $multipleDeleteIds = [];

    public function multipleDeleteShowModal($params)
    {
        $this->multipleDeleteIds = $params;
        $this->multipleDeleteShowModal = true;
    }

    public function multipleDeleteExecute()
    {
        if (!empty($this->multipleDeleteIds)) {
            foreach ($this->multipleDeleteIds as $deleteId) {
                $findContent = Content::where('id', $deleteId)->first();
                if ($findContent !== null) {
                    $findContent->delete();
                }
            }
        }

        $this->emit('refreshProductsTable');
        $this->multipleDeleteShowModal = false;
    }

    public function render()
    {
        return view('livewire::livewire.content-bulk-options');
    }
}

