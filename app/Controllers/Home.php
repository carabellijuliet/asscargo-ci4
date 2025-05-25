<?php

namespace App\Controllers;

use App\Models\StatusModel;
use App\Models\PengirimanModel;

class Home extends BaseController
{
    public function index()
    {
        return view('frontpage');
    }
    
    public function track()
    {
        $sttAss = $this->request->getGet('stt_ass');
        
        if (!$sttAss) {
            return redirect()->to('/')->with('error', 'Nomor STT Ass harus diisi');
        }
        
        $pengirimanModel = new PengirimanModel();
        $statusModel = new StatusModel();
        
        $pengiriman = $pengirimanModel->where('stt_ass', $sttAss)->first();
        
        if (!$pengiriman) {
            return redirect()->to('/')->with('error', 'Nomor STT Ass tidak ditemukan');
        }
        
        $statusHistory = $statusModel->where('pengiriman_id', $pengiriman['id'])
                            ->orderBy('created_at', 'DESC')
                            ->findAll();
        
        return view('tracking_result', [
            'pengiriman' => $pengiriman,
            'statusHistory' => $statusHistory
        ]);
    }
}