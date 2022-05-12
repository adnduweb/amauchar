<?php 

namespace Amauchar\Core\Traits;

// Import Excel Package
use \SplTempFileObject;
use \SplFileObject;
use League\Csv\Reader;
use League\Csv\CharsetConverter;
use League\Csv\Writer;
use League\Csv\Statement;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\HTTP\ResponseInterface;

/*** CLASS ***/
trait ExportTrait
{
    /**  @var string  */
    public $supported = ['csv', 'pdf', 'xls'];

    /**  @var string  */
    public $setTitle;

    /**  @var string  */
    public $filename;

    /**  @var object  */
    public $spreadsheet;


    public function exportXls(string $setTitle, string $filename, bool $ajax){
//print_r($this->headerExport); exit;
        $this->spreadsheet = new Spreadsheet();

        $sheet = $this->spreadsheet->getActiveSheet();
        $sheet->setTitle($this->name);
        $sheet->fromArray($this->headerExport, null, 'A1');
        //$sheet->setCellValue('A1', 'Hello World !');
        $sheet->fromArray($this->dataExport, null, 'A2', true);
        
        
        // redirect output to client browser
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename .'"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($this->spreadsheet);

        if($ajax == true){

            ob_start();
            $writer->save('php://output');
            $xlsData = ob_get_contents();
            ob_end_clean();

            return $xlsData;

        }else{
            ob_end_clean();
            $writer->save('php://output');
        }

    }

    public function exportCsv(string $filename, bool $ajax){

        if($ajax == true){

            ob_start();
            $csv = Writer::createFromPath('php://temp', 'r+');
            //we insert the CSV header
            //print_r($this->headerExport);exit;
            $csv->insertOne($this->headerExport);
            $csv->insertAll($this->dataExport);
            $csv->setDelimiter(';');
            $csv->setOutputBOM(Reader::BOM_UTF8);
            $csv->output($filename);

            $csvData = ob_get_contents();
            ob_end_clean();

            return $csvData;

        }else{
            //$csv = Writer::createFromFileObject(new SplFileObject('php://output', 'w'));
            $csv = Writer::createFromPath('php://temp', 'r+');
            //we insert the CSV header
            $csv->insertOne($this->headerExport);
            $csv->insertAll($this->dataExport);
            $csv->setDelimiter(';');
            //we insert
            $csv->setOutputBOM(Reader::BOM_UTF8);
            $csv->output('export_' . strtolower($this->className) . '_' . date('dmyHis') . '.csv');

        }

    }

    public function exportPdf(string $filename, $setPaper, $orientation, bool $ajax){

        if($ajax == true){

            $dompdf = new \Dompdf\Dompdf(); 
            //$customPaper = array(0,0,567.00,283.80);
            $dompdf->loadHtml(view('Themes\backend\\'.setting('App.themebo').'\\_partials\extras\pdf_view_export_datatable', $this->viewData));
            // $dompdf->setPaper('A4', 'landscape');
            $dompdf->setPaper($setPaper, $orientation);
            $dompdf->render();

                                // redirect output to client browser
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0');

            return $dompdf;

        }else{

            $dompdf = new \Dompdf\Dompdf(); 
            $dompdf->loadHtml(view('Themes\backend\\'.setting('App.themebo').'\\_partials\extras\pdf_view_export_datatable', $this->viewData));
            $dompdf->setPaper($setPaper, $orientation);
            $dompdf->render();
            $dompdf->stream($filename, [ "Attachment" => true ]);
            return $dompdf;

        }

    }

    

          /**
     * Export the item (soft).
     *
     * @param string $itemId
     *
     * @return RedirectResponse
     */
    public function export($format = null)
    {

        //https://onlinewebtutorblog.com/export-data-into-excel-report-in-codeigniter-4-tutorial/

        $response = json_decode($this->request->getBody());

        if(!$response->format){
            $response = ['errors' => lang('Core.notChoice')];
            return $this->respond($response, ResponseInterface::HTTP_UNAUTHORIZED);
        }

        $this->export = $this->tableModel->getExport();
        $this->dataExport = $this->export['data'];
        $this->headerExport = $this->export['column'];

        switch ($response->format) {
            case 'excel':
                if ($this->request->isAJAX()) {
                    $exportXls  = $this->exportXls($this->name, strtolower($this->name).'-'.time().'.xlsx', true);
                    $response = ['success' => lang('Core.resourcesExport'), 'op' => 'ok', 'file' => "data:application/vnd.ms-excel;base64,".base64_encode($exportXls)];
                    return $this->respond($response, ResponseInterface::HTTP_OK);
                }else{
                    $exportXls  = $this->exportXls($this->name, strtolower($this->name).'-'.time().'.xlsx', false);
                    exit;
                } 
                break;
            case 'csv':
                if ($this->request->isAJAX()) {
                    $exportCsv  = $this->exportCsv('export_' . strtolower($this->name) . '_' . date('dmyHis') . '.csv', true);
                    $response = ['success' => lang('Core.resourcesExport'), 'op' => 'ok', 'file' => "data:application/vnd.ms-excel;base64,".base64_encode($exportCsv)];
                    return $this->respond($response, ResponseInterface::HTTP_OK);
                }else{
                    $exportCsv  = $this->exportCsv('export_' . strtolower($this->name) . '_' . date('dmyHis') . '.csv', false);
                    exit;
                }
                break;
            case 'pdf':
                if ($this->request->isAJAX()) {

                    $this->viewData['header'] =  $this->headerExport;
                    $this->viewData['data'] = $this->dataExport;

                    $exportPdf  = $this->exportPdf('export_' . strtolower($this->name) . '_' . date('dmyHis') . '.pdf', 'A4', 'portrait', true);
                    $response = ['success' => lang('Core.resourcesExport'), 'op' => 'ok', 'file' => "data:application/pdf;base64,".base64_encode($exportPdf->output())];
                    return $this->respond($response, ResponseInterface::HTTP_OK);
                    exit;


                }else{
                    $this->viewData['header'] =  $this->headerExport;
                    $this->viewData['data'] = $this->dataExport;
                    $exportPdf  = $this->exportPdf('export_' . strtolower($this->name) . '_' . date('dmyHis') . '.pdf', 'A4', 'portrait', false);
                    exit;
                }
    
                break;
            default:
                $response = ['code' => 204, 'message' => lang('Core.not_choice'), 'success' => true, csrf_token() => csrf_hash()];
                return $this->respond($response, 204, 'pas content');
        }
       
    }
}