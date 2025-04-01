<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductAuditResource\Pages;
use App\Models\ProductAudit;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductAuditResource extends Resource
{
    protected static ?string $model = ProductAudit::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Auditoria de Produtos';

    protected static ?string $pluralLabel = 'Auditoria de Produtos';

    protected static ?string $singularLabel = 'Registro de Auditoria';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('details.name')
                    ->label('Produto')
                    ->default('-')
                    ->sortable(query: fn ($query, $direction) => $query->orderBy('details->name', $direction))
                    ->searchable(query: fn ($query, $search) => $query->where('details->name', 'like', "%{$search}%")),
                Tables\Columns\TextColumn::make('action')
                    ->label('Ação')
                    ->formatStateUsing(fn (string $state) => match ($state) {
                        'created' => 'Criado',
                        'updated' => 'Atualizado',
                        'deleted' => 'Excluído',
                        'restored' => 'Restaurado',
                        'force_deleted' => 'Excluído Permanentemente',
                        default => $state,
                    }),
               
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuário')
                    ->default('-')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('action')
                    ->label('Ação')
                    ->options([
                        'created' => 'Criado',
                        'updated' => 'Atualizado',
                        'deleted' => 'Excluído',
                        'restored' => 'Restaurado',
                        'force_deleted' => 'Excluído Permanentemente',
                    ]),
            ])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductAudits::route('/'),
        ];
    }
}
