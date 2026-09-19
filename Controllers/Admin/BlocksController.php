<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Block\Controllers\Admin;

use App\Controllers\Admin\BaseResourcePresenter;
use CodeIgniter\Files\File;

class BlocksController extends BaseResourcePresenter
{
    protected $modelName = 'BasicApp\Block\Models\Blocks';

    protected $templatesPath = 'BasicApp\Block\admin/blocks';

    protected $baseUrl = 'admin/blocks';

    protected $messageCreated = 'Admin.Block created.';

    protected $messageUpdated = 'Admin.Block updated.';

    protected $messageDeleted = 'Admin.Block deleted.';

    protected $helpers = ['form'];

    public function index()
    {
        $elements = $this->model->orderBy('block_sort', 'ASC')->paginate($this->perPage);

        return view($this->templatesPath . '/index', [
            'elements' => $elements,
            'labels' => $this->model->labels(),
            'pager' => $this->model->pager
        ]);
    }

    public function new()
    {
        $data = $this->createData(array_merge(
            [
                'block_active' => 1
            ],
            $this->request->getGet()
        ));

        return view($this->templatesPath . '/new', [
            'data' => $data,
            'labels' => $this->model->labels(),
            'errors' => validation_errors()
        ]);
    }

    public function create()
    {
        $data = $this->createData();

        $data->fill($this->request->getPost());

        if (!$id = $this->saveData($data, $errors)) 
        {
            $this->session->setFlashdata('_ci_validation_errors', $errors);

            return redirect()->back()->withInput();
        }

        $this->session->setFlashdata('success', lang($this->messageCreated));

        return redirect()->to($this->baseUrl);
    }

    public function edit($id = null)
    {
        $data = $this->findOrFail($id);

        return view($this->templatesPath . '/edit', [
            'data' => $data,
            'labels' => $this->model->labels(),
            'errors' => validation_errors()
        ]);
    }

    public function update($id = null)
    {
        $data = $this->findOrFail($id);

        $data->fill($this->request->getPost());

        if (!$this->saveData($data, $errors)) 
        {
            $this->session->setFlashdata('_ci_validation_errors', $errors);

            return redirect()->back()->withInput();
        }

        $this->session->setFlashdata('success', lang($this->messageUpdated));

        return redirect()->to($this->baseUrl);
    }

    public function delete($id = null)
    {
        $data = $this->findOrFail($id);

        $id = $this->model->getIdValue($data);

        $this->model->delete($id);

        $this->session->setFlashdata('success', lang($this->messageDeleted));

        return redirect()->back();
    }
}