<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReductionCalculationResource\Pages;
use App\Models\ReductionCalculation;
use App\Models\ReductionSubType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;


class ReductionCalculationResource extends Resource
{
    protected static ?string $model = ReductionCalculation::class;

    protected static ?string $navigationIcon = 'heroicon-o-calculator';

    protected static ?string $navigationGroup = 'Reductions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')->default(Auth::id()),
                Select::make('re_sub_id')
                    ->label('Reduction Sub Type')
                    ->relationship('reductionSubType', 'sub_type')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $reductionSubType = ReductionSubType::findOrFail($get('re_sub_id'));
                        $set('re_id', $reductionSubType->re_id);
                        if ($reductionSubType->reductionType) {
                            $set('re_type_name', $reductionSubType->reductionType->type); // Using 'type' column 
                        } else {
                            $set('re_type_name', 'Unknown');
                        }
                    }),
                Hidden::make('re_id')
                    ->required(),
                TextInput::make('re_type_name')
                    ->label('Reduction Type')
                    ->required()
                    ->disabled(),
                TextInput::make('amount')
                    ->numeric()
                    ->required(),
                Select::make('month')
                    ->label('Month')
                    ->required()
                    ->options([
                        1 => 'Jan',
                        2 => 'Feb',
                        3 => 'Mar',
                        4 => 'Apr',
                        5 => 'May',
                        6 => 'Jun',
                        7 => 'Jul',
                        8 => 'Aug',
                        9 => 'Sept',
                        10 => 'Oct',
                        11 => 'Nov',
                        12 => 'Dec',
                    ])
                    ->preload()
                    ->searchable(),
                TextInput::make('year')
                    ->placeholder('เช่น 2024')
                    ->numeric()
                    ->required()
                    ->minValue(1900)
                    ->maxValue(2100)
                    ->default(now()->year),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('reductionType.type')
                    ->label('Reduction Type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('reductionSubType.sub_type')
                    ->label('Reduction Sub Type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('amount')
                    ->numeric()
                    ->formatStateUsing(fn($state) => number_format($state, 4))
                    ->sortable(),
                TextColumn::make('month')
                    ->formatStateUsing(fn($state) => [
                        1 => 'Jan',
                        2 => 'Feb',
                        3 => 'Mar',
                        4 => 'Apr',
                        5 => 'May',
                        6 => 'Jun',
                        7 => 'Jul',
                        8 => 'Aug',
                        9 => 'Sep',
                        10 => 'Oct',
                        11 => 'Nov',
                        12 => 'Dec',
                    ][$state] ?? 'Unknown'),
                TextColumn::make('year')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('reduction_type_id')
                    ->label('Reduction Type')
                    ->relationship('reductionType', 'type')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('reduction_sub_type_id')
                    ->label('Reduction Sub Type')
                    ->relationship('reductionSubType', 'sub_type')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReductionCalculations::route('/'),
            'create' => Pages\CreateReductionCalculation::route('/create'),
            'edit' => Pages\EditReductionCalculation::route('/{record}/edit'),
        ];
    }
}
