
@extends('templates.template-adm')

<!-- Links CSS-->

@section('link-css')
    
@endsection

@section('cont-adm')
        
            <h1>Dashboard</h1>

            <div class="date">
                <input type="date">
            </div>

            <div class="insights">

                <div class="sales">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        
                        <div class="left">
                            <h3 class="titulo-card">Cadastros</h3>
                            <h1>89</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>

                        </div>
                    </div>

                    <small class="text-muted">Últimas 24 Horas</small>
                </div>

                <div class="expenses">
                    <span class="material-icons-sharp">bar_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3 class="titulo-card">Postagens</h3>
                            <h1>267</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>


                        </div>
                    </div>

                    <small class="text-muted">Últimas 24 horas</small>
                </div>

                <div class="income">
                    <span class="material-icons-sharp">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3 class="titulo-card">Anúncios</h3>
                            <h1>13</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>

                        </div>
                    </div>

                    <small class="text-muted">Últimas 24 horas</small>
                </div>
            </div>

            <div class="recent-orders">
                <h2>Pedidos Recentes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nome do produto</th>
                            <th>Número do produto</th>
                            <th>Pagamento</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Anúncio</td>
                            <td>854697</td>
                            <td>Pix</td>
                            <td class="warning">Esperando</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>Publi</td>
                            <td>1658547</td>
                            <td>Dinheiro</td>
                            <td class="success">Concluída</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>Colaboração</td>
                            <td>8934567</td>
                            <td>Pix</td>
                            <td class="success">Concluída</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>Publi</td>
                            <td>2386971</td>
                            <td>Pix</td>
                            <td class="warning">Esperando</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                    </tbody>
                </table>

                

                <a href="#">Mostrar tudo</a>
            </div>

@endsection

